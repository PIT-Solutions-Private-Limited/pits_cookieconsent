<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'PITS.' . $_EXTKEY,
    'Pitscookieconsent',
    array(
        'Cookieconsent' => 'list',
    ),
    // non-cacheable actions
    array(
        'Cookieconsent' => '',
    )
);
