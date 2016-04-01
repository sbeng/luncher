require 'rubygems'
require 'capybara'
require 'capybara/dsl'
require 'capybara-webkit'
require 'capybara-screenshot'
 
Capybara.run_server = false
Capybara.current_driver = :webkit
Capybara.app_host = "http://cookdrive.com.ua"
 
module Spider 
  class Cookdrive
    include Capybara::DSL

    Capybara::Webkit.configure do |config|
      config.allow_unknown_urls
      config.skip_image_loading
      config.debug = false
    end

    Capybara::Screenshot.autosave_on_failure = false

    def place_order(id, phone, name, street, home, floor, comment, links)
      begin
        page.driver.browser.ignore_ssl_errors
        page.driver.header 'Referer', 'http://cookdrive.com.ua/'

        food = []

        links.each do |link|
          begin
            visit(link.gsub('http://cookdrive.com.ua',''))
            sleep 1
            page.find('.product__content').find('.in-cart').click
            sleep 1

            price = page.find('.product__content').find('.product__price').text.gsub(' грн.','')

            food << {link: link, price: price, error: ''}
          rescue Exception => e
            food << {link: link, price: -1, error: e.message}
          end  
        end

        page.find('.basket').find('a.btn-green-big').click
        sleep 1
        screenshot_and_open_image

        page.find('.form-box__controls-group').find('.btn-green-medium').click
        total = page.find('.basket__total').find('span').text.gsub(' грн.','')

        page.find('#type').click
        page.find('#time').click
        page.find_field('phone').set(phone.gsub('+380',''))
        page.find_field('name').set(name)
        page.find_field('street').set(street)
        page.find_field('home').set(home)
        page.find_field('floor').set(floor)
        page.find_field('comment').set(comment)

        screenshot_and_open_image

        page.find('.pseudo-btn') #.click
        return {id: id, total: total, result: 'success', message: '', food: food}
      rescue Exception => e
        return {id: id, total: -1, result: 'error', message: e.message, food: (food rescue '')}
      end 
    end
  end
end

id, phone, name, street, home, floor, comment = ARGV[0..6]
ARGV[0..6] = []
 
spider = Spider::Cookdrive.new
p spider.place_order(id, phone, name, street, home, floor, comment, ARGV)

