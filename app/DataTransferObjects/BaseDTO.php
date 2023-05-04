<?php

namespace App\DataTransferObjects;

abstract class BaseDTO
{
    /**
     * Fill dto fields using loop
     *
     * @param array $data
     * @return BaseDTO
     */
    public function fromArray(array $data): BaseDTO
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        return $this;
    }

    /**
     * Get DTO fields into array
     *
     * @return array
     */
    public function toArray(): array
    {
        $data = [];

        $classProperties = array_keys(get_class_vars(get_class($this)));

        foreach ($classProperties as $property) {
            if (property_exists($this, $property)) {
                $data[$property] = $this->$property;
            }
        }

        return $data;
    }
}
