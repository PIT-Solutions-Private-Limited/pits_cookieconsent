<?php
namespace PITS\PitsCookieconsent\Controller;

use \TYPO3\CMS\Extbase\Utility\LocalizationUtility;
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
 * CookieconsentController
 */
class CookieconsentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @var \PITS\PitsCookieconsent\Domain\Repository\CookieconsentRepository
     */
    protected $cookieconsentRepository = null;

    /**
     * @var \TYPO3\CMS\Core\Page\PageRenderer
     */
    protected $pageRenderer;

    /**
     * @param \PITS\PitsCookieconsent\Domain\Repository\CookieconsentRepository $cookieconsentRepository
     * @return void
     */
    public function injectCookieconsentRepository(\PITS\PitsCookieconsent\Domain\Repository\CookieconsentRepository $cookieconsentRepository) {
        $this->cookieconsentRepository = $cookieconsentRepository;
    }

    /**
     * @param \TYPO3\CMS\Core\Page\PageRenderer $cookieconsentRepository
     * @return void
     */
    public function injectPageRenderer(\TYPO3\CMS\Core\Page\PageRenderer $pageRenderer) {
        $this->pageRenderer = $pageRenderer;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $settings       = $this->settings['flexform'];
        $position       = $this->cookieconsentRepository->getPosition($this->settings);
        $layout         = $settings['layout'];
        $palette        = $settings['palette'];
        $linksettings   = $settings['link'];
        $text           = $settings['text'];
        $comp           = $settings['compliance'];
        $cookie         = [];

        $default_link   = $this->cookieconsentRepository->getTemplateValues(GeneralUtility::_GP('id'));

        //colour pallette section
        $bgcolor        = ($palette['banner'] == '') ? '#000000' : $palette['banner'] ;
        $textcolor      = ($palette['bannertext'] == '') ? '#ffffff' : $palette['bannertext'];
        $bcolor         = ($palette['button'] == '') ? '#00ff47' : $palette['button'];
        $btextcolor     = ($palette['buttontext'] == '') ? '#000000' : $palette['buttontext'];

        //position section
        if($position == 'statictop'){
            $this->view->assign('static', 'static');
        }

        $message = str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)LocalizationUtility::translate('def_message','pits_cookieconsent')), "\0..\37'\\")));
        $dismissbutton = str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)LocalizationUtility::translate('def_dismissbutton','pits_cookieconsent')), "\0..\37'\\")));
        $linktext = str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)LocalizationUtility::translate('def_linktext','pits_cookieconsent')), "\0..\37'\\")));
        $acceptbutton = str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)LocalizationUtility::translate('def_acceptbutton','pits_cookieconsent')), "\0..\37'\\")));
        $denybutton = str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)LocalizationUtility::translate('def_denybutton','pits_cookieconsent')), "\0..\37'\\")));
        $revokebutton = str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)LocalizationUtility::translate('def_revokebutton','pits_cookieconsent')), "\0..\37'\\")));

        //text management section
        $text['message']        = ($text['message'] == '') ? $message : str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$text['message']), "\0..\37'\\")));
        $text['dismissbutton']  = ($text['dismissbutton'] == '') ? $dismissbutton : str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$text['dismissbutton']), "\0..\37'\\")));
        $text['linktext']       = ($text['linktext'] == '') ? $linktext : str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$text['linktext']), "\0..\37'\\")));
        $text['acceptbutton']   = ($text['acceptbutton'] == '') ? $acceptbutton : str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$text['acceptbutton']), "\0..\37'\\")));
        $text['denybutton']     = ($text['denybutton'] == '') ? $denybutton : str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$text['denybutton']), "\0..\37'\\")));
        $text['revokebutton']   = $revokebutton;

        //layout section
        if($layout == 'edgeless' || $layout == 'classic'){
            $this->view->assign('layout', $layout);
        }elseif($layout == 'wire'){
            $this->view->assign('wire', $layout);
        }else{
        }

        //link section
        if($linksettings['disable'] != 1){
            $url = ($linksettings['value'] == 0 || $linksettings['value'] == '') ? $default_link : $linksettings['value'];
            //url generation 
            $link = $GLOBALS['TSFE']->cObj->typoLink_URL(
                array(
                    'parameter' => $url,
                    'forceAbsoluteUrl' => true,
                )
            );
        }else{
            unset($link);
        }

        if($link == ''){
            $linksettings['disable'] = 1;
        }

        if($linksettings['disable'] != 1 && ($text['message'] != '' || $text['dismissbutton'] != '' || $text['linktext'] != '' || $text['acceptbutton'] != '' || $text['denybutton'] != '')){
            $content = 1;
        }elseif($linksettings['disable'] == 1 && ($text['message'] != '' || $text['dismissbutton'] != '' || $text['linktext'] != '' || $text['acceptbutton'] != '' || $text['denybutton'] != '')){
            $content = 2;
        }elseif($linksettings['disable'] != 1 && ($text['message'] == '' || $text['dismissbutton'] == '' || $text['linktext'] == '' || $text['acceptbutton'] == '' || $text['denybutton'] == '')){
            $content = 3;
        }else{
            $content = 4;
        }

        $this->view->assignMultiple(array(
            'link'          => $link,
            'position'      => $position,
            'bgcolor'       => $bgcolor,
            'textcolor'     => $textcolor,
            'bcolor'        => $bcolor,
            'btextcolor'    => $btextcolor,
            'content'       => $content,
            'text'          => $text,
            'comp'          => $comp
        ));
    }
}
