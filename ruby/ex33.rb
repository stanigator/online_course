i = 0
numbers = []

while i < 6
  puts "At the top i is #{i}"
  numbers.push(i)
  
  i = i + 1         # i++ doesn't work b/c it's not reserved in Ruby
  puts "Numbers now: #{numbers}"
  puts "At the bottom i is #{i}"
end

puts "The numbers: "

for num in numbers
  puts num
end
