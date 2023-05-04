<?php

namespace App\DataTransferObjects;

interface BaseDTOInterface
{
    /**
     * Fill DTO fields using loop
     *
     * @param array $data
     * @return BaseDTO
     */
    public function fromArray(array $data): BaseDTO;

    /**
     * Get DTO fields into array
     *
     * @return array
     */
    public function toArray(): array;
}
