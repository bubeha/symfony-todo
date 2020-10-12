<?php

declare(strict_types=1);

namespace App\Entity\Traits;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

trait TimeStampable
{
    /**
     * @ORM\Column(type="datetime")
     */
    protected DateTimeInterface $created;

    /**
     *
     * @ORM\Column(type="datetime", nullable = true)
     */
    protected DateTimeInterface $updated;

    /**
     * Gets triggered only on insert
     * @ORM\PrePersist()
     */
    public function onPrePersist(): void
    {
        $dateTime = new DateTime("now");

        $this->created = $dateTime;
        $this->updated = $dateTime;
    }

    /**
     * Gets triggered every time on update
     * @ORM\PreUpdate()
     */
    public function onPreUpdate(): void
    {
        $this->updated = new DateTime("now");
    }
}
