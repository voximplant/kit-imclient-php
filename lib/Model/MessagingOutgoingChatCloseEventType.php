<?php
/**
 * MessagingOutgoingChatCloseEventType
 *
 * PHP version 5
 *
 * @category Class
 * @package  VoximplantKitIM
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Voximplant Kit Messaging API Documentation
 *
 * <h1>Basic description</h1>  <p>HTTP API is available via the <u>https://kit-im-{{region}}.voximplant.com/<b>{method}</b></u> endpoint. To send events you need to use jwt token. You can get jwt token via login method using an api token created on api tokens page. You need to pass api token as access_token.</p>  <h1>Authentication</h1>   <p>The parameters that are needed to be sent for generate jwt token are as follows:</p> <ul>   <li><strong>access_token</strong></li>   <li><strong>domain</strong></li> </ul>
 *
 * OpenAPI spec version: 2.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.24
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace VoximplantKitIM\Model;

use \ArrayAccess;
use VoximplantKitIM\ObjectSerializer;

/**
 * MessagingOutgoingChatCloseEventType Class Doc Comment
 *
 * @category Class
 * @package  VoximplantKitIM
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class MessagingOutgoingChatCloseEventType implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'MessagingOutgoingChatCloseEventType';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'client_data' => '\VoximplantKitIM\Model\MessagingOutgoingNewMessageEventTypeClientData',
        'event_id' => 'string',
        'event_type' => 'string',
        'event_data' => '\VoximplantKitIM\Model\MessagingOutgoingChatCloseEventTypeEventData'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'client_data' => null,
        'event_id' => null,
        'event_type' => null,
        'event_data' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'client_data' => 'client_data',
        'event_id' => 'event_id',
        'event_type' => 'event_type',
        'event_data' => 'event_data'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'client_data' => 'setClientData',
        'event_id' => 'setEventId',
        'event_type' => 'setEventType',
        'event_data' => 'setEventData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'client_data' => 'getClientData',
        'event_id' => 'getEventId',
        'event_type' => 'getEventType',
        'event_data' => 'getEventData'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    const EVENT_TYPE_CONVERSATION = 'close_conversation';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEventTypeAllowableValues()
    {
        return [
            self::EVENT_TYPE_CONVERSATION
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['client_data'] = isset($data['client_data']) ? $data['client_data'] : null;
        $this->container['event_id'] = isset($data['event_id']) ? $data['event_id'] : null;
        $this->container['event_type'] = isset($data['event_type']) ? $data['event_type'] : null;
        $this->container['event_data'] = isset($data['event_data']) ? $data['event_data'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['client_data'] === null) {
            $invalidProperties[] = "'client_data' can't be null";
        }
        if ($this->container['event_id'] === null) {
            $invalidProperties[] = "'event_id' can't be null";
        }
        if ($this->container['event_type'] === null) {
            $invalidProperties[] = "'event_type' can't be null";
        }
        $allowedValues = $this->getEventTypeAllowableValues();
        if (!is_null($this->container['event_type']) && !in_array($this->container['event_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'event_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['event_data'] === null) {
            $invalidProperties[] = "'event_data' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets client_data
     *
     * @return \VoximplantKitIM\Model\MessagingOutgoingNewMessageEventTypeClientData
     */
    public function getClientData()
    {
        return $this->container['client_data'];
    }

    /**
     * Sets client_data
     *
     * @param \VoximplantKitIM\Model\MessagingOutgoingNewMessageEventTypeClientData $client_data client_data
     *
     * @return $this
     */
    public function setClientData($client_data)
    {
        $this->container['client_data'] = $client_data;

        return $this;
    }

    /**
     * Gets event_id
     *
     * @return string
     */
    public function getEventId()
    {
        return $this->container['event_id'];
    }

    /**
     * Sets event_id
     *
     * @param string $event_id event_id
     *
     * @return $this
     */
    public function setEventId($event_id)
    {
        $this->container['event_id'] = $event_id;

        return $this;
    }

    /**
     * Gets event_type
     *
     * @return string
     */
    public function getEventType()
    {
        return $this->container['event_type'];
    }

    /**
     * Sets event_type
     *
     * @param string $event_type Will have the value 'close_conversation'
     *
     * @return $this
     */
    public function setEventType($event_type)
    {
        $allowedValues = $this->getEventTypeAllowableValues();
        if (!in_array($event_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'event_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['event_type'] = $event_type;

        return $this;
    }

    /**
     * Gets event_data
     *
     * @return \VoximplantKitIM\Model\MessagingOutgoingChatCloseEventTypeEventData
     */
    public function getEventData()
    {
        return $this->container['event_data'];
    }

    /**
     * Sets event_data
     *
     * @param \VoximplantKitIM\Model\MessagingOutgoingChatCloseEventTypeEventData $event_data event_data
     *
     * @return $this
     */
    public function setEventData($event_data)
    {
        $this->container['event_data'] = $event_data;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


