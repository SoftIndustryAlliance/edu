<?php

namespace OOP\Behavioral\ChainOfResponsibility;

class Request
{
    private $email;
    private $reportKey;

    public function __construct(string $email, int $reportKey)
    {
        $this->email = $email;
        $this->reportKey = $reportKey;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of Email
     *
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of Report Key
     *
     * @return mixed
     */
    public function getReportKey()
    {
        return $this->reportKey;
    }

    /**
     * Set the value of Report Key
     *
     * @param mixed $reportKey
     *
     * @return self
     */
    public function setReportKey($reportKey)
    {
        $this->reportKey = $reportKey;

        return $this;
    }
}
