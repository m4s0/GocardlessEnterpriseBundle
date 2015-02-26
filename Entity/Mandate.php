<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 13/11/2014
 * Time: 10:37.
 */

namespace Gocardless\EnterpriseBundle\Entity;

class Mandate extends \GoCardless\Enterprise\Model\Mandate
{
    /**
     * @var string
     */
    protected $pdfPath;

    /**
     * @param string $path
     */
    public function setPdfPath($path)
    {
        $this->pdfPath = $path;
    }

    /**
     * @return string
     */
    public function getPdfPath()
    {
        return $this->pdfPath;
    }

    public function toArray()
    {
        $arr = parent::toArray();
        if (array_key_exists("pdfPath", $arr)) {
            unset($arr["pdfPath"]);
        }

        return $arr;
    }

    public function fromArray($data)
    {
        parent::fromArray($data);
        $this->setCreatedAt(new \DateTime($this->getCreatedAt()));
    }

    public function isActive()
    {
        return !in_array($this->getStatus(), ["failed", "cancelled"]);
    }
}
