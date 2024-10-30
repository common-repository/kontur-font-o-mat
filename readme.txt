=== kontur font-o-mat ===
Contributors: netzaufsicht
Donate link: https://www.paypal.com/paypalme/werbekontur/3EUR/
Tags: fonts, gutenberg, typography, adobe fonts, font weight
Requires at least: 6.0
Tested up to: 6.5
Stable tag: 1.1.2
Requires PHP: 7.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Going wild with fonts on Gutenberg editor!


== Description ==

We are going wild with the fonts in the Gutenberg RichText editor toolbar. Change font family and/or size on each word or even a single letter - just as you like! This one is for the font-lovers. You can set up to 5 fonts. And even can set CSS-classes you want them as well to be applied to. In addition, you can specify, name and select up to 4 font weights and font sizes.

# Take a walk on the wild font side #
* **add up to 5 custom fonts to your editor blocks** (Gutenberg)
* set your individual CSS-classes you want those fonts to be applied to 
* set **up to 4 individual font sizes**
* set **up to 4 different font weights**
* fonts and sizes can be even applied to a single word OR even single letters!



## Font family ##

**Change the font for individual words, phrases or even letters inline in the Gutenberg editor.**
This works automatically for most blocks *("Paragraph Block", "Heading Block"...)*.
On the settings page you can activate up to 5 fonts and give them friendly names. And at the same time enter several CSS classes to which these fonts should be assigned.
*Being able to name the fonts can be very handy for the other editors on your site as they rarely know the font names, only where they are used most of the time. So you could just name your heading font "our headings" etc. for easier work.*

## Font size ##

**Up to four font sizes can be set.** 
The font sizes can also be named to make it easier for editors to use in the Gutenberg editor.

The font size is calculated as a percentage of the base font size. Changing a font size setting on the settings page will change that font size across the site.

Font sizes can be assigned inline in the editor to sentences, words or even individual letters.

## Font weight ##

Set up to 4 different font weights from 200 to 900 and give the font weights their own names to make them easier for editors to use. Example: You could call the font weight 900 *"supder-duper bold"*. Just be creative, it's your backend!

## Demo ##

Want to play around with it? 
Check the
[Demo on WordPress Playground](https://playground.wordpress.net/?blueprint-url=https%3A%2F%2Fwordpress.org%2Fplugins%2Fwp-json%2Fplugins%2Fv1%2Fplugin%2Fkontur-font-o-mat%2Fblueprint.json%3Furl_hash%3De9ae0e399a1597d01f2040a9b7b5a627)


> **Want more**
  Please get involved and send uns your ideas. Via email or on the WordPress support page :-)

**Uninstalling**

This plugin cleans up after itself. All plugin settings will be removed from your database when the plugin is uninstalled via the Plugins screen.



== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `kontur-font-mat` to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

3. Go to WordPress Admin > Settings > kontur Font-o-Mat and change your settings

[More info on installing WP plugins](https://wordpress.org/support/article/managing-plugins/#installing-plugins)

== Frequently Asked Questions ==

= Where do I find the settings? =

Under WordPress Admin > Settings kontur > kontur Font-o-Mat or click the link 'Settings' under the plugin in your WordPress Admin Plugins section.


= How many fonts can I add? =

We currently support the setup and use of **up to five font families**. So far we haven't met anyone who would use more different fonts. BUT write to us if you need more font families and we will add more in the next version.

= How do I set my font-family? =

Fill in the field with your CSS. BUT without "font-family:" before it, just the value to use for the "font-family". For example, if you want to enable and use "Open Sans", you just need to type `'Open Sans', sans-serif`.
For security reasons, we disabled the entire line of CSS, but that also makes typing easier.

= What does "get classy mean? How can I force the font to be attached to my theme css or other classes? =

You can set the fonts as well to other elements on your side. So if if you want the font to override e.g. all "h1.yourclass" headlines you can put 
"h1.yourclass" into the field an it will be shown on all "h1.yourclass" elements on your site.

Fill in the field with your CSS. BUT without the "font-family:". We deactivated the full CSS line for security reasons. So you just have to input `'Open Sans', sans-serif;` if you e.g. would want to activate Open Sans.

= How do I include my Adobe or Google fonts? =

Note: This plugin is not really primarily intended for including external fonts, we only included this because someone asked for it. The plugin does not check if the font has been loaded before, so please only use this if you are sure the font has not been loaded yet. 

But you can simply set up a package with several fonts in "Adobe Fonts", for example, and then simply insert the link. And then activate the individual fonts. These fonts then appear on your website, but also in the Gutenberg Editor in the backend.

Just place the url 
e.g. with Google Fonts you do find at "Use on the web" on the "@import. 
But just the URL and NOT the whole code. Meaning for e.g "open sans" font = `https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,800;1,400&display=swap`
**With "Adobe-Fonts" you just have to paste the link, and done.**

= Is there a premium version I could buy?  =

No. **This is a free plugin. And by free, we mean free.**
*However, there is also no pro-support for it. If problems arise, please note that we will try to fix them as soon as possible. But unfortunately we are not available 24/7, so please be patient.*

= Do you offer any other free WordPress plugins I could use =

Yes, we got three of them you'd might like:

* [No admin premium Nags](https://wordpress.org/plugins/no-aioseop-nags/) to stop the premium version spam AND to add your own CSS to the WP backend.
Works so far "out of the box" for "All in one SEO" and "Yoast-Seo".

* [kontur Admin Style](https://wordpress.org/plugins/kontur-admin-style/) Set your own admin backend style. Customize the colors of the admin menus. Put your own logo on the login page, the editor and the backend. AND customize your login page to suit your style.

* [kontur Copy Code Button](https://wordpress.org/plugins/kontur-font-o-mat/) add your own ‘kontur Copy Code Button’ to any code-block on your site. When clicked, the code is copied to the clipboard. Works as well on mobile devices and the standard Gutenberg WP-Code-Block. Set your own button-text(s), button-icon or image from the library, class(es), button-color, button-text-color and “pre”-Background.

= I need something else. Can I hire you? =

Yes. Please get in touch via email [email](hello@kontur.us) with a brief description of your requirements and budget for the project and we will start something else together.

= This plugin is simple, but I want to show my appreciation? =

Well, go for it! You can either [make a donation](https://www.paypal.com/paypalme/werbekontur/3EUR/) or leave a [rating](https://wordpress.org/support/plugin/kontur-admin-style/reviews/?rate=5#new-post) to motivate me to keep working on the plugin.  

== Screenshots ==
1. View of the Gutenberg editor with the activated plugin
2. Settings page view
3. View on the page with individual fonts
4. Example view with wild font-family and size settings
5. Settings page: Set our font sizes
6. Settings page: Set our font weights
7. Settings page: Set up to 5 fonts
8. Gutenberg: Select font-size and font-weight. Both with your custom names.
9. Gutenberg: Select font - with your custom name - to be applied to word(s), or even single letters


== Changelog ==

= 1.1.2 =
* Date: 03.April.2024
* Updated/fixed fonts and styles loaded into the Gutenberg editor and block themes
* Updated settings page
* Updated readme


= 1.1.1 =
* Date: 09.May.2023
* Updated settings page
* Updated readme
* Added screenshots


= 1.1.0 =
* Date: 23.November.2022
* Updated settings page
* Added options for font-weights. 

= 1.0.1 =
* Date: 08.January.2022
* First release of the plugin.

== Upgrade Notice ==
= 1.1.0 =
* Updated settings page
* Added options for font-weights. 


== Upgrade Notice ==

= 1.1.2 =
This updates loads fonts and styles into the Gutenberg editor and block themes "site editor"




