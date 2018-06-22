<?php
namespace PITS\PitsCookieconsent\Domain\Repository;

use \TYPO3\CMS\Core\Utility\GeneralUtility;

/***
 *
 * This file is part of the "PITS Cookie Consent" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Anu Bhuvanendran Nair <anu.bn@pitsolutions.com>, PIT Solutions Pvt. Ltd.
 *
 ***/

/**
 * The repository for CookieControls
 */
class CookieconsentRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * 
     */
    public function getPosition($options){

        switch($options['flexform']['position']){
            case 'bbottom': return;
            break;
            case 'btop': return 'top';
            break;
            case 'btoppush': return 'statictop';
            break;
            case 'floatl': return 'bottom-left';
            break;
            case 'floatr': return 'bottom-right';
            break;
            default : return NULL;
            break;
        }
    }

    /**
     * Returns default link value from typoscript
     * @param int $pid
     * @return void
     */
    public function getTemplateValues($pid)
    {
        $sysPageObj      = GeneralUtility::makeInstance('TYPO3\CMS\Frontend\Page\PageRepository');
        $rootLine        = $sysPageObj->getRootLine($pid);
        $TSObj           = GeneralUtility::makeInstance('TYPO3\CMS\Core\TypoScript\TemplateService');
        $TSObj->tt_track = 0;
        $TSObj->init();
        $TSObj->runThroughTemplates($rootLine);
        $TSObj->generateConfig();

        return $TSObj->setup['plugin.']['tx_pitscookieconsent.']['defaultlink.']['value'];
    }


}
