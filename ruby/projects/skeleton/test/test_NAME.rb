require "test/unit"

class MyUnitTests < Test::Unit::TestCase

	def setup
		puts "setup!"
	end

	def teardown
		puts "teardown!"
	end

	def test_basic
		puts "I RAN!"
	end

    def hello
        puts "Hello!"
    end
end
