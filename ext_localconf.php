<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'PITS.PitsCookieconsent',
            'Pitscookieconsent',
            [
                'Cookieconsent' => 'list'
            ],
            // non-cacheable actions
            [
                'Cookieconsent' => ''
            ]
        );
    },
    $_EXTKEY
);
