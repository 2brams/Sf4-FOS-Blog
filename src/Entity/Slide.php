<?php

namespace App\Entity;

use App\Annotation\Uploadable;
use App\Annotation\UploadableField;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SlideRepository")
 * @Uploadable()
 */
class Slide
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $grandTitre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $petitTitre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apparitionG;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apparitionP;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filename;

    /**
     * @UploadableField(filename="filename",path="uploads")
     * @Assert\Image(minWidth="1900",minHeight="925")
     */
    private $file;

    /**
     * @ORM\Column(name="updated_at",type="datetime",nullable=true)
     */

    private $updatedAt;

    public function getId()
    {
        return $this->id;
    }

    public function getGrandTitre(): ?string
    {
        return $this->grandTitre;
    }

    public function setGrandTitre(string $grandTitre): self
    {
        $this->grandTitre = $grandTitre;

        return $this;
    }

    public function getPetitTitre(): ?string
    {
        return $this->petitTitre;
    }

    public function setPetitTitre(string $petitTitre): self
    {
        $this->petitTitre = $petitTitre;

        return $this;
    }

    public function getApparitionG(): ?string
    {
        return $this->apparitionG;
    }

    public function setApparitionG(string $apparitionG): self
    {
        $this->apparitionG = $apparitionG;

        return $this;
    }

    public function getApparitionP(): ?string
    {
        return $this->apparitionP;
    }

    public function setApparitionP(string $apparitionP): self
    {
        $this->apparitionP = $apparitionP;

        return $this;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get the value of file
     *
     * @return  File/null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set the value of file
     *
     * @param  File  $file/null
     *
     * @return  self
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
