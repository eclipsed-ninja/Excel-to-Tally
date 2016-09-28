<?php

/*
 * (C) Ashish Saxena <ashish@reak.in>
 * (C) 2016 REAK INFOTECH LLP
 *
 * The LICENSE file included with the project would govern the use policy for this code,
 * In case of missing LICENSE file the code will be treated as an Intellectual Property of the creator mentioned above,
 * All rights related to distribution, modifcation, reselling, use for commercial or private use of this code is terminated.
 *
 */



function makexml(){

$out='
<ENVELOPE>
<HEADER>
<TALLYREQUEST>Import Data</TALLYREQUEST>
</HEADER>
<BODY>
<IMPORTDATA>
<REQUESTDESC>
<REPORTNAME>Vouchers</REPORTNAME>
<STATICVARIABLES>
<SVCURRENTCOMPANY>REAK INFOTECH LLP</SVCURRENTCOMPANY>
</STATICVARIABLES>
</REQUESTDESC>
<REQUESTDATA>';

$csv = array_map('str_getcsv', file('data.csv'));
for ($i = 0; $i < count($csv); $i++ ) {
    
    $vouchertype=$csv[$i][1];
    $date=$csv[$i][0];
    $invoiceno=$csv[$i][2];
    $voucherno=$csv[$i][8];
    $ledger1=$csv[$i][3];
    $amount=$csv[$i][4];
    $ledger2=$csv[$i][5];

$out=$out.'
<TALLYMESSAGE xmlns:UDF="TallyUDF">
 <VOUCHER VCHTYPE="'.$vouchertype.'" ACTION="Create">
  <DATE>'.$date.'</DATE>
  <NARRATION>Invoice # : '.$invoiceno.'</NARRATION>
  <VOUCHERTYPENAME>'.$vouchertype.'</VOUCHERTYPENAME>
  <VOUCHERNUMBER>'.$voucherno.'</VOUCHERNUMBER>
  <PARTYLEDGERNAME>'.$ledger1.'</PARTYLEDGERNAME>
  <CSTFORMISSUETYPE/>
  <CSTFORMRECVTYPE/>
  <FBTPAYMENTTYPE>Default</FBTPAYMENTTYPE>
  <VCHGSTCLASS/>
  <DIFFACTUALQTY>No</DIFFACTUALQTY>
  <AUDITED>No</AUDITED>
  <FORJOBCOSTING>No</FORJOBCOSTING>
  <ISOPTIONAL>No</ISOPTIONAL>
  <EFFECTIVEDATE>'.$date.'</EFFECTIVEDATE>
  <USEFORINTEREST>No</USEFORINTEREST>
  <USEFORGAINLOSS>No</USEFORGAINLOSS>
  <USEFORGODOWNTRANSFER>No</USEFORGODOWNTRANSFER>
  <USEFORCOMPOUND>No</USEFORCOMPOUND>
  <ALTERID> '.$voucherno.'</ALTERID>
  <EXCISEOPENING>No</EXCISEOPENING>
  <ISCANCELLED>No</ISCANCELLED>
  <HASCASHFLOW>No</HASCASHFLOW>
  <ISPOSTDATED>No</ISPOSTDATED>
  <USETRACKINGNUMBER>No</USETRACKINGNUMBER>
  <ISINVOICE>No</ISINVOICE>
  <MFGJOURNAL>No</MFGJOURNAL>
  <HASDISCOUNTS>No</HASDISCOUNTS>
  <ASPAYSLIP>No</ASPAYSLIP>
  <ISDELETED>No</ISDELETED>
  <ASORIGINAL>No</ASORIGINAL>
  <ALLLEDGERENTRIES.LIST>
   <LEDGERNAME>'.$ledger1.'</LEDGERNAME>
   <GSTCLASS/>
   <ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>
   <LEDGERFROMITEM>No</LEDGERFROMITEM>
   <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
   <ISPARTYLEDGER>Yes</ISPARTYLEDGER>
   <AMOUNT>-'.$amount.'</AMOUNT>
   <BILLALLOCATIONS.LIST>
    <NAME>'.$invoiceno.'</NAME>
    <BILLTYPE>New Ref</BILLTYPE>
    <AMOUNT>-'.$amount.'</AMOUNT>
   </BILLALLOCATIONS.LIST>
  </ALLLEDGERENTRIES.LIST>
  <ALLLEDGERENTRIES.LIST>
   <LEDGERNAME>'.$ledger2.'</LEDGERNAME>
   <GSTCLASS/>
   <ISDEEMEDPOSITIVE>No</ISDEEMEDPOSITIVE>
   <LEDGERFROMITEM>No</LEDGERFROMITEM>
   <REMOVEZEROENTRIES>No</REMOVEZEROENTRIES>
   <ISPARTYLEDGER>No</ISPARTYLEDGER>
   <AMOUNT>'.$amount.'</AMOUNT>
  </ALLLEDGERENTRIES.LIST>
 </VOUCHER>
</TALLYMESSAGE>
';


}

$out =$out.'
</REQUESTDATA>
</IMPORTDATA>
</BODY>
</ENVELOPE>
';


header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=tally.xml");
echo $out;

}

?>