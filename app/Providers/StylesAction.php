<?php
// В файле app/Actions/StylesAction.php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class StylesAction extends AbstractAction
{
    public function getDefaultRoute()
    {
        return null;
    }

    public function getTitle()
    {
        return '';
    }

    public function getIcon()
    {
        return '';
    }

    public function getPolicy()
    {
        return '';
    }

    public function getAttributes()
    {
        return [];
    }

    public function getRoute($dataType)
    {
        return null;
    }

    public function shouldActionDisplayOnDataType()
    {
        return false;
    }

    public function render()
    {
        // Вставляем CSS прямо в страницу
        return '<style>
            .language-selector { margin-bottom: 10px; padding: 10px; background-color: #f8f9fa; border-radius: 4px; }
            .language-selector .btn-group { width: 100%; display: flex; }
            .language-selector .btn { flex: 1; text-align: center; }
            .language-selector .btn.active { background-color: #22A7F0; color: white; }
            .form-group.translatable-field { border-left: 3px solid #22A7F0; padding-left: 10px; }
            .form-group.translatable-field label:after { content: " 🌐"; }
        </style>';
    }
}