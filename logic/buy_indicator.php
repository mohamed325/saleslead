<?php
// Function to check string starting 
// with given substring 
function startsWith ($string, $startString) 
{ 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
} 
        /*
 AddBuyingIndicator updates each leads' indicator field 
  Uses 5 different base to increment the buyindictor field based on 
 the key indictors of leads buying.
*/
function addBuyIndicator ($newLead){
    $contigous_states = array(
        'AL'=>'ALABAMA',
        'AZ'=>'ARIZONA',
        'AR'=>'ARKANSAS',
        'CA'=>'CALIFORNIA',
        'CO'=>'COLORADO',
        'CT'=>'CONNECTICUT',
        'DE'=>'DELAWARE',
        'DC'=>'DISTRICT OF COLUMBIA',
        'FL'=>'FLORIDA',
        'GA'=>'GEORGIA',
        'ID'=>'IDAHO',
        'IL'=>'ILLINOIS',
        'IN'=>'INDIANA',
        'IA'=>'IOWA',
        'KS'=>'KANSAS',
        'KY'=>'KENTUCKY',
        'LA'=>'LOUISIANA',
        'ME'=>'MAINE',
        'MD'=>'MARYLAND',
        'MA'=>'MASSACHUSETTS',
        'MI'=>'MICHIGAN',
        'MN'=>'MINNESOTA',
        'MS'=>'MISSISSIPPI',
        'MO'=>'MISSOURI',
        'MT'=>'MONTANA',
        'NE'=>'NEBRASKA',
        'NV'=>'NEVADA',
        'NH'=>'NEW HAMPSHIRE',
        'NJ'=>'NEW JERSEY',
        'NM'=>'NEW MEXICO',
        'NY'=>'NEW YORK',
        'NC'=>'NORTH CAROLINA',
        'ND'=>'NORTH DAKOTA',
        'OH'=>'OHIO',
        'OK'=>'OKLAHOMA',
        'OR'=>'OREGON',
        'PA'=>'PENNSYLVANIA',
        'RI'=>'RHODE ISLAND',
        'SC'=>'SOUTH CAROLINA',
        'SD'=>'SOUTH DAKOTA',
        'TN'=>'TENNESSEE',
        'TX'=>'TEXAS',
        'UT'=>'UTAH',
        'VT'=>'VERMONT',
        'VA'=>'VIRGINIA',
        'WA'=>'WASHINGTON',
        'WV'=>'WEST VIRGINIA',
        'WI'=>'WISCONSIN',
        'WY'=>'WYOMING',
    );
    $buyIndictor = 0;
    //rate 0 - 4 who is likely to buy
            //with 0 being ineligible and 4 highly likely to buy
             $ineligible = 0;
             $byCarrierPigeon = 1;
             $byEmailOrSms = 2;
             $byPhone = 3;
             $highlyLikely = 4;
              //if newlead's state is within the 48 states procede
            //rest of the logic otherwise with buyincator to zero and return
            $state = strtoupper($newLead->state);
         
            if ((in_array($state, $contigous_states)) || (array_key_exists($state, $contigous_states))){
             //if newlead zip starts with 7 
             //increment Buyindictor with highlyLikely rate
             if(startsWith($newLead->zip,'7')){
              $buyIndictor += $highlyLikely;
             }
              //if newlead name has z 
              //increment Buyindictor with highlyLikely rate
              $name = strtolower($newLead->name);
                if(strpos($name,'z') !==false)
                {
                    $buyIndictor += $highlyLikely;
                }
                //if newlead choose phone as contact
                //increment Buyindictor with byphone rate
                if ($newLead->contact_method === 'phone')
                {
                    $buyIndictor += $byPhone;
                }
                //if newlead choose email or sms as contact
                //increment Buyindictor with byemailorSms rate
                if ($newLead->contact_method === 'sms' || $newLead->contact_method === 'email')
                {
                    $buyIndictor += $byEmailOrSms;
                }
                 //if newlead choose email or CarrierPigeon as contact
                //increment Buyindictor with byCarrierPigeon rate
                if ($newLead->contact_method === 'CarrierPigeon')
                {
                    $buyIndictor += $byCarrierPigeon;
                }
            }
            else
            {
                //if new lead is not in the 48 states not eligible to buy
                $buyIndictor = $ineligible;
            }
        

    return $buyIndictor ;
}
        
                
    














?>