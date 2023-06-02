<?php



class AccessRights extends Maintenance
{
    private $aboutUs, $contactUs, $ratingAdvise, $gallery, $mEmployee, $mFaq, $mNews, $mPartners, $mPosition, $mStations, $tFAQ, $tNews,
    $tPartner, $tStation, $sAuditTrail, $sSystemUser, $mBoard, $mSponsors, $mTeams;

    public function __construct()
    {
        $objectMaintenance = new Maintenance();

        $pos_id = $_SESSION["POSITION_ID"];
        $sqlStatement = "SELECT * FROM tbl_access_rights WHERE position_id = '$pos_id'";
        foreach ($objectMaintenance->selectWithJoin("$sqlStatement") as $value) {
            $this->aboutUs = $value["about_us"];
            $this->contactUs = $value["contact_us"];
            $this->ratingAdvise = $value["rating_advise"];
            $this->gallery = $value["gallery"];
            $this->mEmployee = $value["m_employee"];
            $this->mFaq = $value["m_faq"];
            $this->mNews = $value["m_news"];
            $this->mPartners = $value["m_partners"];
            $this->mPosition = $value["m_position"];
            $this->mStations = $value["m_stations"];
            $this->tFAQ = $value["t_faq"];
            $this->tNews = $value["t_news"];
            $this->tPartner = $value["t_partners"];
            $this->tStation = $value["t_stations"];
            $this->sAuditTrail = $value["s_audit_trail"];
            $this->sSystemUser = $value["s_system_user"];

            $this->mBoard = $value["m_board"];
            $this->mSponsors = $value["m_sponsors"];
            $this->mTeams = $value["m_teams"];

        }


    }

    /**
     * @return mixed
     */
    public function getAboutUs()
    {
        return $this->aboutUs;
    }

    public function getContactUs()
    {
        return $this->contactUs;
    }

    public function getRatingAdvise()
    {
        return $this->ratingAdvise;
    }

    public function getGallery()
    {
        return $this->gallery;
    }

    public function getMEmployee()
    {
        return $this->mEmployee;
    }

    public function getMFAQ()
    {
        return $this->mFaq;
    }

    public function getMNews()
    {
        return $this->mNews;
    }

    public function getMPartner()
    {
        return $this->mPartners;
    }

    public function getMPosition()
    {
        return $this->mPosition;
    }

    public function getMStation()
    {
        return $this->mStations;
    }

    public function getTFAQ()
    {
        return $this->tFAQ;
    }

    public function getTNews()
    {
        return $this->tNews;
    }

    public function getTPartner()
    {
        return $this->tPartner;
    }

    public function getTStation()
    {
        return $this->tStation;
    }

    public function getsAuditTrail()
    {
        return $this->sAuditTrail;
    }

    public function getsSystemUser()
    {
        return $this->sSystemUser;
    }

    public function getmBoard()
    {
        return $this->mBoard;
    }

    public function getmSponsors()
    {
        return $this->mSponsors;
    }

    public function getmTeams()
    {
        return $this->mTeams;
    }

}