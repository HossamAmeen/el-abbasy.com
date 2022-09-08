<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use App\Models\Apartment;
use App\Enums\ApartmentStatus;

class ToggleApartmentStatus extends AbstractAction
{
    public function getTitle()
    {
        // Action title which display in button based on current status
        return $this->data->{'status'}== ApartmentStatus::inactive ?'Active':'Inactive';
    }

    public function getIcon()
    {
        // Action icon which display in left of button based on current status
        return 'voyager-power';
    }

    public function getAttributes()
    {
        // Action button class
        return [
            'class' => 'btn btn-sm btn-primary pull-left',
        ];
    }

    public function shouldActionDisplayOnDataType()
    {
        // show or hide the action button, in this case will show for posts model
        return $this->dataType->slug == 'apartments';
    }

    public function getDefaultRoute()
    {
        // URL for action button when click
        return route('apartments.toggle', array("id"=>$this->data->{$this->data->getKeyName()}));
    }
}
