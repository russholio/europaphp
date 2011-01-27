<?php

/**
 * An validation exception class. Just like an exception except that multiple
 * messages can be bound.
 * 
 * @category messages
 * @package  Europa_message
 * @author   Trey Shugart <treshugart@gmail.com>
 * @license  Copyright (c) 2010 Trey Shugart http://europaphp.org/license
 */
namespace Europa\Validator
{
    class Exception extends \Europa\Exception implements \ArrayAccess, \Iterator, \Countable
    {
        /**
         * The message messages.
         * 
         * @var array
         */
        protected $messages = array();
        
        /**
         * Converts the exception to an array of messages.
         * 
         * @var array
         */
        public function toArray()
        {
            $array = array();
            foreach ($this->messages as $message) {
                $array[] = $message;
            }
            return $array;
        }
        
        /**
         * Autofills the exception with messages.
         * 
         * @param mixed $messages A traversible item of messages.
         * 
         * @return Europa_Validator_ValidationException
         */
        public function fromTraversible($messages)
        {
            if (is_array($messages) || is_object($messages)) {
                foreach ($messages as $message) {
                    $this->offsetSet(null, $message);
                }
            }
            return $this;
        }
        
        /**
         * Array access set.
         * 
         * @param int    $offset  The message offset to add the message at.
         * @param stirng $message The message to add to the message.
         * 
         * @return Europa_Multimessage
         */
        public function offsetSet($offset, $message)
        {
            // make sure a numeric key was passed
            if (!is_numeric($offset)) {
                $offset = count($this->messages);
            }
            
            // add and chain
            $this->messages[$offset] = (string) $message;
            return $this;
        }
        
        /**
         * Array access get.
         * 
         * @param int $offset The offset of the message to retrieve.
         * 
         * @return Europa_Multimessage
         */
        public function offsetGet($offset = null)
        {
            if (!is_numeric($offset)) {
                $offset = $this->count();
            }
            if ($this->offsetExists($offset)) {
                return $this->messages[$offset];
            }
            return null;
        }
        
        /**
         * Array access isset.
         * 
         * @param int $offset The message offset to check for.
         * 
         * @return Europa_Multimessage
         */
        public function offsetExists($offset)
        {
            return isset($this->messages[$offset]);
        }
        
        /**
         * Array access unset.
         * 
         * @param int $offset The message offset to unset the message from.
         * 
         * @return Europa_Multimessage
         */
        public function offsetUnset($offset)
        {
            if ($this->offsetExists($offset)) {
                unset($this->messages[$offset]);
            }
            return $this;
        }
        
        /**
         * Returns the current key.
         * 
         * @return int
         */
        public function key()
        {
            return key($this->messages);
        }
        
        /**
         * Returns the current message.
         * 
         * @return string
         */
        public function current()
        {
            return current($this->messages);
        }
        
        /**
         * Moves to the next message.
         * 
         * @return Europa_Multimessage
         */
        public function next()
        {
            next($this->messages);
            return $this;
        }
        
        /**
         * Resets iteration.
         * 
         * @return Europa_Multimessage
         */
        public function rewind()
        {
            reset($this->messages);
            return $this;
        }
        
        /**
         * Returns whether or not we can still loop.
         * 
         * @return bool
         */
        public function valid()
        {
            return !is_null($this->key());
        }
        
        /**
         * Returns the number of messages in the message.
         * 
         * @return int
         */
        public function count()
        {
            return count($this->messages);
        }
    }
}