<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'PITS.PitsCookieconsent',
            'Pitscookieconsent',
            'PITS Cookie Consent'
        );

        $pluginSignature = str_replace('_', '', $extKey) . '_pitscookieconsent';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $extKey . '/Configuration/FlexForms/flexform_pitscookieconsent.xml');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'PITS Cookie Consent');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pitscookieconsent_domain_model_cookiecontrol', 'EXT:pits_cookieconsent/Resources/Private/Language/locallang_csh_tx_pitscookieconsent_domain_model_cookieconsent.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pitscookieconsent_domain_model_cookieconsent');

    },
    $_EXTKEY
);
