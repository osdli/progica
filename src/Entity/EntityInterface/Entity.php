<?php

declare(strict_types=1);

namespace App\Entity\EntityInterface;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

interface Entity
{
    /**
     * @ORM\PrePersist
     *
     * @throws Exception;
     */
    public function onPrePersist(): void;

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate(): void;
}