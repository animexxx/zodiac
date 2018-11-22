<?php

class Zodiac
{
    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * Zodiac
     *
     * @var string
     */
    protected $zodiac;


    /**
     * Predefined zodiac array
     *
     * @var array
     */
    protected $zodiacArray = array(
        array('name' => 'aries',
            'key' => 0, 'start' => '03-21', 'end' => '04-20'
        ),
        array('name' => 'taurus',
            'key' => 1, 'start' => '04-21', 'end' => '05-20'
        ),
        array('name' => 'gemini',
            'key' => 2, 'start' => '05-21', 'end' => '06-20'
        ),
        array('name' => 'cancer',
            'key' => 3, 'start' => '06-21', 'end' => '07-22'
        ),
        array('name' => 'leo',
            'key' => 4, 'start' => '07-23', 'end' => '08-22'
        ),
        array('name' => 'virgo',
            'key' => 5, 'start' => '08-23', 'end' => '09-22'
        ),
        array('name' => 'libra',
            'key' => 6, 'start' => '09-23', 'end' => '10-22'
        ),
        array('name' => 'scorpio',
            'key' => 7, 'start' => '10-23', 'end' => '11-21'
        ),
        array('name' => 'sagittarius',
            'key' => 8, 'start' => '11-22', 'end' => '12-21'
        ),
        array('name' => 'capricorn',
            'key' => 9, 'start' => '12-22', 'end' => '01-19'
        ),
        array('name' => 'aquarius',
            'key' => 10, 'start' => '01-20', 'end' => '02-18'
        ),
        array('name' => 'pisces',
            'key' => 11, 'start' => '02-19', 'end' => '03-20'
        )
    );

    /**
     * Construct
     *
     * @param string|DateTime $date is a DateTime object or a parse-able string
     */
    public function __construct($date = null)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }
        $this->date = $date;
        $zodiacKey = $this->findZodiac();
        if (null !== $zodiacKey) {
            $this->zodiac = $this->zodiacArray[$zodiacKey]['name'];
        }
    }

    /**
     * Find a zodiac
     *
     * @return mixed
     */
    protected function findZodiac()
    {
        $date = $this->date->getTimestamp();
        $year = $this->date->format('Y');
        foreach ($this->zodiacArray as $zodiac) {
            if ($date >= strtotime($year . '-' . $zodiac['start']) && $date <= strtotime($year . '-' . $zodiac['end'] . ' 23:59:59')) {
                return $zodiac['key'];
            }
        }
        return;
    }


    /**
     * Return zodiac name
     *
     * @return string
     */
    public function getZodiac()
    {
        return $this->zodiac;
    }

}