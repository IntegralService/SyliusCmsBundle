<?php

namespace Lakion\SyliusCmsBundle\Tests\Behat\Page\Admin\Route;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;

final class CreatePage extends BaseCreatePage implements CreatePageInterface
{
    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->getSession()->getPage()->fillField('Name', $name);
    }

    /**
     * {@inheritdoc}
     */
    public function chooseContent($title)
    {
        $this->getSession()->getPage()->selectFieldOption('Content', $title);
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefinedElements()
    {
        return array_merge(parent::getDefinedElements(), [
            'content' => '#lakion_sylius_cms_route_content',
            'name' => '#lakion_sylius_cms_route_name',
        ]);
    }
}
