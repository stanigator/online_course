the_count = [1, 2, 3, 4, 5]     # is there an intelligent way to make this array?
fruits = ["apples", "oranges", "pears", "apricots"]
change = [1, "pennies", 2, "dimes", 3, "quarters"]    # is this a hash table?

# this first kind of for-loop goes through an array
# Question: the entire contents of the array?
for number in the_count
  puts "This is count #{number}"
end

# same as above, but using a block instead
fruits.each do |fruit|
  puts "A fruit of type: #{fruit}"
end

# also we can go through mixed arrays too
for i in change
  puts "I got #{i}"
end

# we can also build arrays, first start with an empty one
elements = []

# then use a range object to do 0 to 5 counts
for i in (0..5)
  puts "Adding #{i} to the list."
  # push is a function that arrays understand
  # FIFO or FILO?
  elements.push(i)
end

# now we can put them out too
for i in elements
  puts "Element was : #{i}"
end
