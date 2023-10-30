# OP Laskuri #

This is a WordPress plugin (or more of a helper) that makes it easier you add
OP calculator to your site without having to code anything.

You need to have an OP merchant account. Read more about it at [OP Kauppiasportaali](https://kauppiasportaali.fi)

This does not work as is. You need files from OP. Read more below.

This is not an official OP plugin.

## Preparations ##

Download this repository from [github.com/kendafi/op-laskuri](https://github.com/kendafi/op-laskuri)

Create a folder called `op-laskuri` (preferrably in you localhost `wp-content/plugins` folder)
and copy all files from the repository into it.

When you have an OP merchant account you should receive the ZIP file `op-laskuri-asennus.zip` from them.

Extract its content into the same `op-laskuri` folder as this `README.md` and `op-laskuri.php` files are in.

You should now have also the following files in the `op-laskuri` folder.

1. `op-calc-widget.css`
2. `op-calc-widget.js`

Set the settings for your calculator on
[OPs site](https://kauppiasportaali.fi/merchants/kirjaudu)

You should receive a script from there.

Copy that script into the file `_op-script.js` and rename the file `op-script.js`.

## Installation ##

Upload the whole `op-laskuri` folder to your website server into the folder `wp-content/plugins`.

Log in to your WordPress admin and enable the `OP Laskuri` plugin.

Edit any page and add the shortcode `[op-laskuri]` into its content.
Save the page and see what it looks like.
The calculator should appear where you added the shortcode.

There is an option to get the webstore version HTML by adding an attribute to the shortcode: `[op-laskuri shop=1]`