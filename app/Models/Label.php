<?php

namespace App\Models;

use Orchestra\Support\Facades\HTML;

class Label extends Model
{
    /**
     * The labels table.
     *
     * @var string
     */
    protected $table = 'labels';

    /**
     * Returns the default labels.
     *
     * @return array
     */
    public static function getDefault()
    {
        return [
            [
                'name' => 'Duplicate',
                'color' => 'default',
            ],
            [
                'name' => 'In Progress',
                'color' => 'info',
            ],
            [
                'name' => 'Question',
                'color' => 'info',
            ],
            [
                'name' => 'Working on it',
                'color' => 'warning',
            ],
            [
                'name' => 'Bug',
                'color' => 'danger',
            ],
            [
                'name' => 'Critical',
                'color' => 'danger',
            ],
        ];
    }

    /**
     * The display attribute accessor.
     *
     * @return string
     */
    public function getDisplayAttribute()
    {
        return (string) $this->getDisplay();
    }

    /**
     * Displays the label in HTML.
     *
     * @return string
     */
    public function getDisplay()
    {
        $color = $this->color;

        return HTML::create('span', $this->name, ['class' => "label label-$color"]);
    }

    /**
     * Displays a large version of the HTML label.
     *
     * @return string
     */
    public function getDisplayLarge()
    {
        return HTML::create('span', $this->getDisplay(), ['class' => 'label-large']);
    }
}
