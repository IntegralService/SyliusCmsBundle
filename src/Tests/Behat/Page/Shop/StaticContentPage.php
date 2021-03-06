<?php

namespace Lakion\SyliusCmsBundle\Tests\Behat\Page\Shop;

use Lakion\SyliusCmsBundle\Document\StaticContent;
use Sylius\Behat\Page\SymfonyPage;
use Webmozart\Assert\Assert;

final class StaticContentPage extends SymfonyPage implements StaticContentPageInterface
{
    /**
     * {@inheritdoc}
     */
    public function access($path)
    {
        return $this->getDriver()->visit($this->makePathAbsolute($path));
    }

    /**
     * {@inheritdoc}
     */
    public function assertPageHasContent(StaticContent $staticContent)
    {
        $this->verify(['name' => $staticContent->getName()]);

        Assert::contains($this->getSession()->getPage()->getHtml(), $staticContent->getTitle());
        Assert::contains($this->getSession()->getPage()->getHtml(), $staticContent->getBody());
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteName()
    {
        return 'lakion_sylius_cms_shop_static_content_show';
    }
}
