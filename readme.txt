=== Sinking Dropdowns WordPress ===
Contributors: yonisink
Donate link: http://www.social-ink.net
Tags: dropdown, menus, hover, responsive, jquery, appearance,drop-down, menu
Requires at least: 3.1
Tested up to: 3.5.1
Stable Tag: 1.21
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Convert default WordPress menu to a responsive hover/click dropdown menu.

== Description ==

Create a WordPress menu (up to three levels) with the WP appearances built-in menu builder and convert it to a nice responsive dropdown using template tags.

Choose your colors, and whether you want a hover or click (click will be permanent on responsive break due to mobile devices' use of hover as a "pre-click").

== Installation ==

1. Upload sinking_dropdown files to a sinking_dropdowns directory in your '/wp-content/plugins/' directory
2. Activate the sinking dropdowns plugin through the 'Plugins' page in WordPress
3. Navigate to "Tools" -> "Dropdowns" in your WordPress admin backend to configure.
4. Use template tag <?php sinking_dropwdown($menu) ?></code> in your php wherever you want your menu to appear, with $menu being the <i>slug</i>, eg <code><?php sinking_dropwdown('main') ?></code>.

== Screenshots ==

1. sinking_dropdowns options - hover/click, and control colors
2. Hover menu on a full screen
3. Menu on a mobile width screen (automatic).

== Frequently Asked Questions ==

= Can I prevent the top items from being clickable on a manual basis (in hover mode)? =

Definitely - go to your WP appearances > menu and reveal the CSS classes for menu items. Then add a "nonclicking" class to the menu items that are just placeholders and shouldn't actually click through.

== Changelog ==

= 1.2 =

Bugfixes and CSS color fixes.

= 1.1.2 =

Fixed color saving bugs.

= 1.1.1 =

Added ability to prevent clickthroughs.

= 1.1 =

Added color choice override options, including alpha transparency choosing, and preventing top clicks.

= 1 =
* Vou por ai a procurar rir pra não chorar.

== Upgrade Notice ==

This is the first version ;-)

= Security notice =

Neither Yonatan Reinberg nor Social Ink are responsible for any security, access or other problems encountered with the use of this plugin. Here's the legalese:

Disclaimer

The materials on Social Ink's web site, including this plugin, are provided "as is". Social Ink makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, Social Ink does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.

Limitations

In no event shall Social Ink or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials, including this plugin, on Social Ink's Internet site, even if Social Ink or a Social Ink authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you. 