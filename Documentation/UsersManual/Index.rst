.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _users-manual:

Users manual
============

PITS Cookie Consent can be used as any TYPO3 plugin. It can also be configured via typoScript. The inclusion of plugin generates a cookie consent widget as below in your page. You can configure the widget further using the plugin options.


.. figure:: /Images/UserManual/Example.png
	:width: 1000px
	:alt: widget view

	Default cookie consent widget in frontend


Plugin Options
==============

**Compliance Level**

Compliance level is the first tab in the plugin options, which decides the site visitor privilage about cookies. There are three levels of compliance, by default plugin just tell users that we use cookies. The three compliance levels are,

- Just tell users that we use cookies
- Let users opt out of cookies (Advanced)  -- opt-out
- Ask users to opt into cookies (Advanced) -- opt-in

.. figure:: /Images/UserManual/pluginscreen.png
	:width: 1000px
	:alt: compliance options

	Plugin options when viewed as a content element in a page (Compliance level)


**Position of Widget**

Position of widget, where it should be rendered can be managed with this option. The default one is banner bottom, which renders the widget below the page spanning the total width

.. figure:: /Images/UserManual/position.png
	:width: 1000px
	:alt: position options

	Position option within plugin


**Layout of Widget**

There are four different styles of widget is available. Default style is block.

.. figure:: /Images/UserManual/layout.png
	:width: 1000px
	:alt: layout options

	Layout option within plugin


**Palette**

Colour options of widget can be managed via this option. Banner, banner text, button and button text colours can be controlled from this tab.

.. figure:: /Images/UserManual/palette.png
	:width: 1000px
	:alt: colour options

	Colour option within plugin


**Link management**

While notifying user about the usage of cookies, it is important to provide them with a valid cookie policy. 'Learn more' link can be handeled through this tab of options. Link can be either be disables or enabled and a wizard will be available to decide the pointing link.

Globally this link can be pointed to anywhere via 'Constants' in typoScript template section.

.. figure:: /Images/UserManual/link.png
	:width: 1000px
	:alt: link options

	Link option within plugin


.. figure:: /Images/UserManual/constants.png
	:width: 1000px
	:alt: global link providing option

	Link option within 'Constants' of TS template section


**Text Section**

Messages and labels in the cookie control widget can be changed and adjusted from here. Message, Button texts and link texts can be adjusted.

.. figure:: /Images/UserManual/text.png
	:width: 1000px
	:alt: text options

	Text option within plugin






