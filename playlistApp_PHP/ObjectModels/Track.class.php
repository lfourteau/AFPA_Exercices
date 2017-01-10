<?php
class Track
{
  private $id;
  private $title;
  private $artist;
  private $duration;
  private $year;
  private $uploadTrack_name;

  function __construct($id, $title, $artist, $duration, $year,$uploadTrack_name)
  {
    $this->id = $id;
    $this->title = $title;
    $this->artist = $artist;
    $this->duration = $duration;
    $this->year = $year;
    $this->uploadTrack_name = $uploadTrack_name;

  }
    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of Title
     *
     * @param mixed title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of Artist
     *
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set the value of Artist
     *
     * @param mixed artist
     *
     * @return self
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get the value of Duration
     *
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of Duration
     *
     * @param mixed duration
     *
     * @return self
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get the value of Year
     *
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of Year
     *
     * @param mixed year
     *
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of Upload Track Name
     *
     * @return mixed
     */
    public function getUploadTrackName()
    {
        return $this->uploadTrack_name;
    }

    /**
     * Set the value of Upload Track Name
     *
     * @param mixed uploadTrack_name
     *
     * @return self
     */
    public function setUploadTrackName($uploadTrack_name)
    {
        $this->uploadTrack_name = $uploadTrack_name;

        return $this;
    }

}
