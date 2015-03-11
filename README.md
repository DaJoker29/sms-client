# sms-client
Simple app takes a message and sends it to a specified phone number using the [TextBelt SMS API](http://textbelt.com/) and [Twitter Bootstrap](http://getbootstrap.com/). Can be useful for rolling your own notification system or just to reasonably annoy someone. **Use at your own risk!**

### Requirements
* [PHP](http://php.net/) w/ [cURL support](http://php.net/manual/en/book.curl.php)


### Instructions

#### Build

1. Install Dependencies - `npm install`
2. Compile `public` folder - `grunt prod` or `grunt dev`
3. Enjoy.

`grunt` will compile the development version and also launch a watch server so you can get right into coding.

#### Add Google Support

To add support for Google contacts, simply add a file named `.client-id` to the project root directory with the OAuth Client ID from your Google Developers Console Project. Make sure to set the correct javascript origins and activate the proper APIs (Contacts and Google+).