.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================

Inclusion of PITS Cookie Control static templates is an unavoidable action for the plugin to work. The plugin can be managed via typoScript to be rendered in the whole website.



TypoScript Configuration
------------------------

For instance, consider page.1000 is an object reserved for nothing but, cookie plugin. Then you can configure the extension by the following TS code (values supplied are possible options). Options are understandable from the name itself.

.. code-block:: JSON

  page.1000 = USER
  page.1000 {
    userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
    extensionName = PitsCookieconsent
    pluginName = Pitscookieconsent
    vendorName    = PITS
    settings {
      flexform {
        compliance = opt-out/opt-in
        position = bbottom/btop/btoppush/floatl/floatr
        layout = edgeless/classic/block/wire
        palette {
          banner = hex color code
          button = hex color code
          bannertext = hex color code
          buttontext = hex color code
        }
        link {
          disable = 0/1
          value = // this is the link option for the cookie policy (Whether an internal or external page) Page id can be given
        }
        text {
          message = any text
          dismissbutton = any text
          linktext = any text
          acceptbutton = any text
          denybutton = any text
        }
      }
    }
  }

All of the text values are translation capable. Translation can be supplied for each label.
If the site uses google analytics and other tracking scripts. Then they must be controlled within PITS Cookie Consent condition. For example,

 page.999 is assigned for google analytics

then,

.. code-block:: JSON

  [PITS\PitsCookieconsent\Userfunc\Cookiecheck]
    page.999 >
  [global]

This condition check disables google analytics, if cookie consent status is denied.