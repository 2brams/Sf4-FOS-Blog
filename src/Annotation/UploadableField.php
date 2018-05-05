<?php

namespace App\Annotation;

use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;

/**
 * @Annotation
 * @Target("PROPERTY")
 */
class UploadableField
{

  private $filename;
  private $path;


    public function __construct(array $options)
    {

        if (empty($options['filename'])) {
            throw new InvalidArgumentException("L'annotation UploadableFile doit avoir un attribut 'filename'");
        }

        if (empty($options['path'])) {
            throw new InvalidArgumentException("L'annotation UploadableFile doit avoir un attribut 'path'");
        }

        $this->filename = $options['filename'];
        $this->path = $options['path'];
    }


  /**
   * Get the value of filename
   */
  public function getFilename()
  {
    return $this->filename;
  }

  /**
   * Get the value of path
   */
  public function getPath()
  {
    return $this->path;
  }
}
