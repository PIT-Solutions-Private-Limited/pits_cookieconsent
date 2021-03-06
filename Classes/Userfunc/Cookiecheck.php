<?php
namespace PITS\PitsCookieconsent\Userfunc;

use TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractCondition;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

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
 * Cookiecheck
 */
class Cookiecheck extends AbstractCondition
{
    /**
     *
     * @return void
     */
    public function matchCondition(array $conditionParameters)
    {
	//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($conditionParameters);
        $result = TRUE;

        if(TYPO3_MODE=='FE'){
           // $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\Extbase\\Object\\ObjectManager');
           // $configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
          //  $extbaseFrameworkConfiguration = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
           // $compliance = $extbaseFrameworkConfiguration['page.']['1000.']['settings.']['flexform.']['compliance'];
	$compliance = $conditionParameters[0];

//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($conditionParameters);
            if(isset($compliance)){
                if ($compliance == 'opt-out' || $compliance == 'info-on'){
                    $result = FALSE;
                }else{
                    $result = TRUE;
                }
            }
            if(isset($_COOKIE['cookieconsent_status'])){
                $cookieVal = $_COOKIE['cookieconsent_status'];
                if ($cookieVal === 'deny'){
                    $result = TRUE;
                }elseif ($cookieVal === 'allow'){
                    $result = FALSE;
                }elseif ($cookieVal === 'dismiss' && $compliance == 'info-on'){
                    $result = FALSE;
                }elseif ($cookieVal === 'dismiss' && $compliance == 'info-off'){
                    $result = TRUE;
                }
            }
	//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($result);exit;
            return $result;
        }

    }
}
