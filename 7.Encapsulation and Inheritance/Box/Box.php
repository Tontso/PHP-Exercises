<?php

class Box
{
    /**
     * @var float
     */
    private $length;

    /**
     * @var float
     */
    private $width;

    /**
     * @var float
     */
    private $height;
    
    /**
     * @param float $length
     * @param float $width
     * @param float $height
     * @throws Exception
     */
    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @throws Exception
     */
    public function setLength(float $length): void
    {
        $this->validateInput($length, "Length");
        $this->length = $length;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @throws Exception
     */
    private function setWidth(float $width): void
    {
        $this->validateInput($width, "Width");
        $this->width = $width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @throws Exception
     */
    public function setHeight(float $height): void
    {
        $this->validateInput($height, "Height");
        $this->height = $height;
    }

    /**
     * @param float $input
     * @param string $value
     * @throws Exception
     */
    private function validateInput(float $input, string $value): void
    {
        if($input <= 0){
            throw new Exception("$value cannot be zero or negative.");
        }
    }

    /**
     * @return float
     */
    private function getValume(): float
    {
        return $this->getLength() * $this->getWidth() * $this->getHeight();
    }

    /**
     * @return float
     */
    private function getLateralSurfaceArea(): float
    {
        return 2 * ($this->getLength() * $this->getHeight())
            + 2 * ($this->getWidth() * $this->getHeight());    
    }

    /**
     * @return float
     */
    private function getlSurfaceArea(): float
    {
        return 2 * ($this->getLength() * $this->getWidth())
            + 2 * ($this->getLength() * $this->getHeight())
            + 2 * ($this->getWidth() * $this->getHeight());
    }

    public function __toString()
    {
        return
        "Surface Area - " . round($this->getlSurfaceArea(), 2) . PHP_EOL
        . "Lateral Surface Area - " . round($this->getLateralSurfaceArea(), 2) . PHP_EOL
        .  "Volume - " . round($this->getValume(), 2) ;
    }
}