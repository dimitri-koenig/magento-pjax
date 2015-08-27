<?php

/**
 * Pjax Response observer which handles pjax requests
 *
 * Additionally you can set a config to move all content from the body tag into a separate div
 *
 *
 * @author Dimitri König <dimitri@dimitrikoenig.net>
 * @since  2015-05-22
 */
class Dk_MagentoPjax_Response_Observer
{
    const XML_PATH_ENABLED = 'dk_magentopjax/move_body_tag_content_into_separate_div';

    /**
     * Main method
     *
     * @return void
     */
    public function handle()
    {
        $response = Mage::app()->getResponse();
        $bodyContentArray = $response->getBody(true);
        $content = $bodyContentArray['default'];

        if ($this->shouldMoveBodyTagContent()) {
            $this->moveBodyTagContent($content);
        }

        if ($this->isPjaxRequest()) {
            $this->leaveOnlyTitleAndContentInBody($content);
        }

        $response->setBody($content);
    }

    /**
     * Checks config option if content of body tag should be moved to a separate div
     *
     * @return boolean
     */
    protected function shouldMoveBodyTagContent()
    {
        return (boolean)Mage::getStoreConfig(self::XML_PATH_ENABLED);
    }

    /**
     * Moves content of body tag to a separate div right after the body tag
     *
     * @param string $content Reference to content string
     *
     * @return void
     */
    protected function moveBodyTagContent(&$content)
    {
        $content = preg_replace('/<body([^>]*)>/is', '<body><div$1>', $content);
        $content = str_ireplace('</body>', '</div></body>', $content);
    }

    /**
     * Checks if current request is an pjax request
     *
     * @return boolean
     */
    protected function isPjaxRequest()
    {
        return (boolean)Mage::app()->getRequest()->getHeader('X_PJAX');
    }

    /**
     * Leaves only title tag of header and the content within the body tag
     *
     * @param string $content Reference to content string
     *
     * @return void
     */
    protected function leaveOnlyTitleAndContentInBody(&$content)
    {
        $content = preg_replace('/.*(<title>.*<\/title>).*<body[^>]*>(.*)<\/body>.*/is', '$1$2', $content);
    }
}