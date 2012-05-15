class Song
  def initialize(name = "John", artist = "Albert", duration=20)
    @name = name
    @artist = artist
    @duration = duration
  end
  
  def to_s
    "Song: #{@name}--#{@artist} (#{@duration})"
  end
end

songA = Song.new
puts songA.to_s

songB = Song.new("Hailey", "Jesus", 300)
puts songB.to_s

songC = Song.new()
puts songC.to_s
