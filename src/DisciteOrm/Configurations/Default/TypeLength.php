<?php

namespace DisciteOrm\Configurations\Default;

use DisciteOrm\Configurations\Enums\Columns\ValueTypeBinary;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeDate;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeFloat;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeInteger;
use DisciteOrm\Configurations\Enums\Columns\ValueTypeString;

class TypeLength
{
        public static array $LENGTH_MAP = 
    [
        ValueTypeString::SmallText->name  => 100,        
        ValueTypeString::String->name     => 255,        
        ValueTypeString::MediumText->name => 16777215,   
        ValueTypeString::LongText->name   => 4294967295, 
        ValueTypeString::UUID->name       => 36,         
        ValueTypeString::Email->name      => 320,        
        ValueTypeString::URL->name        => 2083,       
        ValueTypeString::IP->name         => 45,         
        ValueTypeString::Username->name   => 50,         
        ValueTypeString::Password->name   => 255,        

        ValueTypeInteger::TinyInt->name   => 3,          
        ValueTypeInteger::SmallInt->name  => 5,          
        ValueTypeInteger::MediumInt->name => 8,          
        ValueTypeInteger::Integer->name   => 10,         
        ValueTypeInteger::BigInt->name    => 20,         
        ValueTypeInteger::Boolean->name   => 1,          
        ValueTypeInteger::UnixTime->name  => 10,         

        ValueTypeFloat::Float->name       => [10, 2],
        ValueTypeFloat::Double->name      => [16, 4],
        ValueTypeFloat::Decimal->name     => [10, 2],     

        ValueTypeDate::Date->name         => 0,          
        ValueTypeDate::Time->name         => 0,
        ValueTypeDate::DateTime->name     => 0,
        ValueTypeDate::Timestamp->name    => 0,
        ValueTypeDate::Year->name         => 4,

        ValueTypeBinary::Blob->name       => 65535,      
        ValueTypeBinary::TinyBlob->name   => 255,        
        ValueTypeBinary::MediumBlob->name => 16777215,   
        ValueTypeBinary::LongBlob->name   => 4294967295, 
        ValueTypeBinary::Json->name       => 65535,      
        ValueTypeBinary::File->name       => 65535,      
    ];
}

?>