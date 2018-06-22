<?php
namespace PITS\PitsCookieconsent\Userfunc;

use \TYPO3\CMS\Core\Configuration\TypoScript\ConditionMatching\AbstractCondition;

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
        if(isset($_COOKIE['cookieconsent_status'])){
            $cookieVal = $_COOKIE['cookieconsent_status'];
            if($cookieVal === 'deny'){
                $result = TRUE;
            }
        }
        return $result;
    }
}
