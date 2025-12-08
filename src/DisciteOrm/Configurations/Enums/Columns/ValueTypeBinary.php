<?php

namespace DisciteOrm\Configurations\Enums\Columns;

/**
 * Enum representing different value types for binary columns in the ORM configuration.
 * 
 * @enum ValueTypeBinary
 */
enum ValueTypeBinary: int
{
    /**
     * __Blob__
     * 
     * Binary Large Object – for large binary data (e.g. images, files).
     */
    case Blob = 270;

    /**
     * __TinyBlob__
     * 
     * Tiny binary data (up to 255 bytes).
     */
    case TinyBlob = 271;

    /**
     * __MediumBlob__
     * 
     * Medium binary data (up to 16 MB).
     */
    case MediumBlob = 272;

    /**
     * __LongBlob__
     * 
     * Long binary data (up to 4 GB).
     */
    case LongBlob = 273;

    /**
     * __Json__
     * 
     * JSON structured format – must be valid JSON.
     */
    case Json = 274;

    /**
     * __File__
     * 
     * Default blob file.
     */
    case File = 275;

}

?>