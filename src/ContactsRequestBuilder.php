<?php

namespace Pndata\iRaiser;

class ContactsRequestBuilder extends RequestBuilder
{

    protected $uri = '/contacts';

    public function fromDate($date)
    {
        $this->uriParam('fromDate', $date);
        return $this;
    }

    public function toDate($date)
    {
        $this->uriParam('toDate', $date);
        return $this;
    }

    public function page($page)
    {
        $this->uriParam('page', $page);
        $this->limit();
        return $this;
    }

    public function limit($limit = 50)
    {
        $this->uriParam('maxResults', $limit);
        return $this;
    }

    //'/contacts/fromDate/2012-01-01/toDate/2013-01-01/page/1/maxResults/20/'

}

?>
