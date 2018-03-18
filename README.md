# magento-pjax | Magento Performance Booster [UNMAINTAINED CODE]

This module makes use of [jquery-pjax](https://github.com/defunkt/jquery-pjax). It works by sending an ajax request to the server when a user clicks on an internal link. The server sends the body content only and replaces it with the current body content.

For more information take a look at jquery-pjax.


## Preparation

To eliminate any side effects of this performance you should go through every module and template and take care of the following possible issues:

* All CSS styles should be the same on every page no matter what page you are loading
* All JS files should either be the same on every page or be moved within the body tag
* The body tag should not contain any content, like id or class attributes. As an alternative you can set the option down below to have that automatically be transformed on every page load.


## Options

Set `dk_magentopjax/move_body_tag_content_into_separate_div` config option to 1 so that every content of the body tag will be moved to a separate div right after the body tag.


## Contributing


1. [Fork it!](https://github.com/dimitri-koenig/magento-pjax/fork)
2. Create your feature branch (`git checkout -b feature/my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin feature/my-new-feature`)
5. Create new Pull Request


## Author

Dimitri König (@dimitrikoenig)


## License

This module is open-sourced software licensed under the [Apache 2.0 license](http://opensource.org/licenses/Apache-2.0)
