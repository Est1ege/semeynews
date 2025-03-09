<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class PreviewNewsAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Предпросмотр';
    }

    public function getIcon()
    {
        return 'voyager-eye';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right',
            'target' => '_blank',
        ];
    }

    public function getDefaultRoute()
    {
        // Вернуть URL для предпросмотра новости
        return route('news.show', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        // Отображать только для модели News
        return $this->dataType->slug == 'news';
    }
}