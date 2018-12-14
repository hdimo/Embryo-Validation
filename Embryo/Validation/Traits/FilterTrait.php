<?php 

    /**
     * FilterTrait
     */

    namespace Embryo\Validation\Traits;

    use DateTime;
    use Psr\Http\Message\UploadedFileInterface;
    
    trait FilterTrait 
    {
        /**
         * Check if email.
         *
         * @param mixed $email
         * @return bool|string
         */
        protected function email($email)
        {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        /**
         * Check if file.
         *
         * @param mixed $files
         * @return bool
         */
        protected function file($files): bool
        {
            if (!is_array($files) && !$files instanceof UploadedFileInterface) {
                return false;
            }
            return true;
        }

        /**
         * Check if array.
         *
         * @param mixed $array
         * @return bool
         */
        protected function array($array): bool
        {
            return is_array($array);
        }

        /**
         * Check if datetime.
         *
         * @param mixed $date
         * @return bool
         */
        protected function datetime($date): bool
        {
            $check = DateTime::createFromFormat('Y-m-d', $date);
            return $check && $check->format('Y-m-d') === $date;
        }

        /**
         * Check if number.
         *
         * @param mixed $number
         * @return bool
         */
        protected function number($number): bool
        {
            return is_numeric($number); 
        }

        /**
         * Check if integer.
         *
         * @param mixed $int
         * @return bool|int
         */
        protected function int($int)
        {
            return filter_var($int, FILTER_VALIDATE_INT);
        }

        /**
         * Check if float.
         *
         * @param mixed $float
         * @return bool|float
         */
        protected function float($float)
        {
            return filter_var($int, FILTER_VALIDATE_FLOAT);
        }

        /**
         * Check if url.
         *
         * @param mixed $url
         * @return bool|string
         */
        protected function url($url)
        {
            return filter_var($url, FILTER_VALIDATE_URL);
        }

        /**
         * Check if boolean.
         *
         * @param mixed $boolean
         * @return bool
         */
        protected function boolean($boolean): bool
        {
            return filter_var($boolean, FILTER_VALIDATE_BOOLEAN);
        }

        /**
         * Any.
         *
         * @param mixed $value
         * @return bool
         */
        protected function any($value): bool
        {
            return true;
        }

        /**
         * Sanitize string.
         *
         * @param string $type
         * @param mixed $value
         * @return mixed
         */
        protected function sanitize(string $type, $value) 
        {
            if ($type === 'text') {
                return filter_var($value, FILTER_SANITIZE_STRING);
            } else {
                return $value;
            }
        }
    }