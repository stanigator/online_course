# -*- encoding: utf-8 -*-
require File.expand_path('../lib/lorem/version', __FILE__)

Gem::Specification.new do |gem|
  gem.authors       = ["Stanley Lee"]
  gem.email         = ["stanigator@gmail.com"]
  gem.description   = %q{No description}
  gem.summary       = %q{I'll think about this later}
  gem.homepage      = ""
  gem.add_development_dependency "rspec"

  gem.files         = `git ls-files`.split($\)
  gem.executables   = gem.files.grep(%r{^bin/}).map{ |f| File.basename(f) }
  gem.test_files    = gem.files.grep(%r{^(test|spec|features)/})
  gem.name          = "lorem"
  gem.require_paths = ["lib"]
  gem.version       = Lorem::VERSION
end
