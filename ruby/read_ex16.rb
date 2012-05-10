filename = ARGV.first

txt = File.open(filename)
puts "Here is your file from Exercise 16: #{filename}"
puts txt.read()

txt.close()
