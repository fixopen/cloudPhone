<?php

class medias
{

    private static $tableName = 'media';

    use Permission,
        DataAccess,
        Statistics,
        JSON,
        PathProcess,
        BinaryUploader,
        BinaryDownloader,
        NormalFacadeImpl,
        Facade;

    private $name = '';
    private $content = ''; //uri or real-text-content
    private $mimeType = '';
    private $applicationType = '';
    private $length = 0;
    private $creatorId = 0;
    private $deviceId = 0;
    private $createTime = '';

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContent()
    {
        $result = $this->content;
        if (empty($result)) {
            $base = 'C:/httpd-2.4.12-win64-VC11/Apache24/htdocs/cloudPhone/var/medias/';
            $prefix = $base;
            //$prefix = '/Library/WebServer/Documents/var/medias/';
            $ext = '';
            switch ($this->mimeType) {
                case 'application/pdf':
                    $ext = 'pdf';
                    break;
                case 'audio/mp3':
                    $ext = 'mp3';
                    break;
            }
            $result = $prefix . $this->getId() . '.' . $ext;
        }
        return $result;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getMimeType()
    {
        return $this->mimeType;
    }

    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }

    public function getApplicationType()
    {
        return $this->applicationType;
    }

    public function setApplicationType($applicationType)
    {
        $this->applicationType = $applicationType;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getCreatorId()
    {
        return $this->creatorId;
    }

    public function setCreatorId($creatorId)
    {
        $this->creatorId = $creatorId;
    }

    public function getDeviceId()
    {
        return $this->deviceId;
    }

    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    public function getCreateTime()
    {
        return $this->createTime;
    }

    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

}

?>
