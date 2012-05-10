require "open-uri"

open("http://www.ruby-lang.org/en") do |f|
  f.each_line {|line| p line}
  puts f.base_uri                 # <URI::HTTP:0x40e6ef2 URL:http://www.ruby-lang.org/en/>
  puts f.content_type             # "text/html"
  puts f.charset                  # "iso-8859-1"
  puts f.content_encoding         # []
  puts f.last_modified            # Thu Dec 05 02:45:02 UTC 2002
end

# end notes
#
# Differences between "require" and "include"
# The require method does what include does in most other programming languages: run another file. It 
# also tracks what you've required in the past and won't require the same file twice. To run another 
# file without this added functionality, you can use the load method.
# The include method takes all the methods from another module and includes them into the current 
# module. This is a language-level thing as opposed to a file-level thing as with require. The include 
# method is the primary way to "extend" classes with other modules (usually referred to as mix-ins). 
# For example, if your class defines the method "each", you can include the mixin module Enumerable 
# and it can act as a collection. This can be confusing as the include verb is used very differently 
# in other languages.
#
# Directories system Ruby will look in for libraries
# If file path is not specified, pre-defined directories in $LOAD_PATH environment variable
