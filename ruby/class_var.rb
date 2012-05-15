class Song
  @@plays = 0
  
  def initialize(name, artist, duration)
    @name = name
    @artist = artist
    @duration = duration
    @plays = 0
  end
  
  def play
    @plays += 1
    @@plays += 1
    "This song: #@plays plays. Total #@@plays plays."
  end
end

s1 = Song.new("Song1", "Artist1", 234)    # test songs
s2 = Song.new("Song2", "Artist2", 345)   

puts s1.play
puts s2.play
puts s1.play
puts s1.play 
