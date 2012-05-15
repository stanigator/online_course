class Song
  def initialize(name, artist, duration)
    @name = name
    @artist = artist
    @duration = duration
  end
  
  def to_s
    "Song: #{@name}--#{@artist} (#{@duration})"
  end
end

class KarokeSong < Song
  def initialize(name, kname, artist, duration, lyrics)
    super(name, artist, duration)
    @name = kname
    @lyrics = lyrics
  end
  
  def to_s
    "KS: #{@name}--#{@artist} (#{@duration}) [#{@lyrics}] **#{@name}**"
  end
end

songA = Song.new("Bicyclops", "Fleck", 260)
puts songA.to_s

songB = KarokeSong.new("John", "Casey", "The Band", 400, "And now, the...")
puts songB.to_s
